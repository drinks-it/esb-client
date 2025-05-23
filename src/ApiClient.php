<?php

namespace Nrgone\EsbClient;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Nrgone\EsbClient\Factory\EsbClientFactory;
use Nrgone\EsbClient\Request\AlcoholTaxReportingWarehouseRequest;
use Nrgone\EsbClient\Request\EmailRequest;
use Nrgone\EsbClient\Request\MarketplaceOrderRequest;
use Nrgone\EsbClient\Request\OrderRequest;
use Nrgone\EsbClient\Request\PimProductMsiFallbackRequest;
use Nrgone\EsbClient\Request\PimProductPriceRequest;
use Nrgone\EsbClient\Request\PixiCustomerOrdersReportRequest;
use Nrgone\EsbClient\Request\PixiReportOrderHeaderRequest;
use Nrgone\EsbClient\Request\PixiReportTaxRequest;
use Psr\Log\LoggerInterface;

final class ApiClient
{
    private const HTTP_OK = 200;
    private const HTTP_ACCEPTED = 202;
    private const HTTP_NO_CONTENT = 204;

    /**
     * @var EsbClientFactory
     */
    private $esbClientFactory;

    /**
     * @var LoggerInterface
     */
    private $logger;

    private $client;

    public function __construct(EsbClientFactory $esbClientFactory, LoggerInterface $logger)
    {
        $this->esbClientFactory = $esbClientFactory;
        $this->logger = $logger;
    }

    private function getClient(): Client
    {
        if (null === $this->client) {
            $this->client = $this->esbClientFactory->create();
        }
        return $this->client;
    }

    public function getSchedulerCommands(): array
    {
        $response = $this->getClient()->request(
            'GET',
            'api/scheduler_commands',
            [
                'headers' => [
                    'Content-Type' => 'application/vnd.api+json',
                    'Accept' => 'application/vnd.api+json',
                ],
            ]
        );
        return json_decode((string)$response->getBody()->getContents(), true);
    }

    public function sendPimProductPriceRequest(PimProductPriceRequest $pimProductPriceRequest): void
    {
        $data = [
            'type' => 'PimProductPriceRequest',
            'attributes' => [
                'countryCode' => $pimProductPriceRequest->getCountryCode(),
                'sku' => $pimProductPriceRequest->getSku(),
                'pricePrivat' => $pimProductPriceRequest->getPricePrivat(),
                'priceGastro' => $pimProductPriceRequest->getPriceGastro(),
                'priceHandel' => $pimProductPriceRequest->getPriceHandel(),
            ],
        ];
        $response = $this->getClient()->request(
            'POST',
            'api/pim_product_price_requests',
            [
                'headers' => [
                    'Content-Type' => 'application/vnd.api+json',
                    'Accept' => 'application/vnd.api+json',
                ],
                RequestOptions::JSON => ['data' => $data],
            ]
        );
        $this->logger->info('PimProductPriceRequest has been send', $data);
        if ($response->getStatusCode() !== self::HTTP_ACCEPTED) {
            throw new \RuntimeException("Unexpected response code: {$response->getStatusCode()}");
        }
    }

    public function canSavePimProduct(string $countryCode, string $sku): bool
    {
        try {
            $response = $this->getClient()->request(
                'GET',
                sprintf('api/pim/validate-product/%s/%s', $countryCode, $sku),
                [
                    'headers' => [
                        'Content-Type' => 'application/vnd.api+json',
                        'Accept' => 'application/vnd.api+json',
                    ]
                ]
            );
            return $response->getStatusCode() === self::HTTP_NO_CONTENT;
        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            return false;
        }
    }

    public function sendInventoryUpdateRequest(array $skus): void
    {
        $response = $this->getClient()->request(
            'POST',
            'api/sap/sync-stock',
            [
                'headers' => [
                    'Content-Type' => 'application/vnd.api+json',
                    'Accept' => 'application/vnd.api+json',
                ],
                RequestOptions::JSON => ['skus' => $skus],
            ]
        );
        $this->logger->info('InventoryUpdateRequest has been send', $skus);
        if ($response->getStatusCode() !== self::HTTP_NO_CONTENT) {
            throw new \RuntimeException("Unexpected response code: {$response->getStatusCode()}");
        }
    }

    public function sendEmailRequest(EmailRequest $emailRequest): void
    {
        $data = [
            'type' => 'EmailRequest',
            'attributes' => [
                'from' => $emailRequest->getFrom(),
                'to' => $emailRequest->getTo(),
                'sender' => $emailRequest->getSender(),
                'subject' => $emailRequest->getSubject(),
                'cc' => $emailRequest->getCc(),
                'bcc' => $emailRequest->getBcc(),
                'replyTo' => $emailRequest->getReplyTo(),
                'contentType' => $emailRequest->getContentType(),
                'charset' => $emailRequest->getCharset(),
                'text' => $emailRequest->getText(),
                'html' => $emailRequest->getHtml(),
                'attachment' => $emailRequest->getAttachment(),
                'attachmentName' => $emailRequest->getAttachmentName(),
                'attachmentContentType' => $emailRequest->getAttachmentContentType(),
            ],
        ];
        $response = $this->getClient()->request(
            'POST',
            'api/email_requests',
            [
                'headers' => [
                    'Content-Type' => 'application/vnd.api+json',
                    'Accept' => 'application/vnd.api+json',
                ],
                RequestOptions::JSON => ['data' => $data],
            ]
        );
        $this->logger->info('EmailRequest has been send', $data);
        if ($response->getStatusCode() !== self::HTTP_ACCEPTED) {
            throw new \RuntimeException("Unexpected response code: {$response->getStatusCode()}");
        }
    }

    public function sendPixiReportTaxRequest(PixiReportTaxRequest $pixiReportTaxRequest): void
    {
        $data = [
            'type' => 'PixiReportTaxRequest',
            'attributes' => [
                'from' => $pixiReportTaxRequest->getFrom()->format('Y-m-d'),
                'to' => $pixiReportTaxRequest->getTo()->format('Y-m-d'),
                'recipientEmail' => $pixiReportTaxRequest->getRecipientEmail(),
            ],
        ];
        $response = $this->esbClientFactory->create()->request(
            'POST',
            'api/pixi_report_tax_requests',
            [
                'headers' => [
                    'Content-Type' => 'application/vnd.api+json',
                    'Accept' => 'application/vnd.api+json',
                ],
                RequestOptions::JSON => ['data' => $data],
            ]
        );
        $this->logger->info('PixiReportTaxRequest has been send', $data);
        if ($response->getStatusCode() !== self::HTTP_ACCEPTED) {
            throw new \RuntimeException("Unexpected response code: {$response->getStatusCode()}");
        }
    }

    public function sendPixiReportOrderHeaderRequest(PixiReportOrderHeaderRequest $pixiReportOrderHeaderRequest): void
    {
        $data = [
            'type' => 'PixiReportOrderHeaderRequest',
            'attributes' => [
                'from' => $pixiReportOrderHeaderRequest->getFrom()->format('Y-m-d'),
                'to' => $pixiReportOrderHeaderRequest->getTo()->format('Y-m-d'),
                'recipientEmail' => $pixiReportOrderHeaderRequest->getRecipientEmail(),
            ],
        ];
        $response = $this->esbClientFactory->create()->request(
            'POST',
            'api/pixi_report_order_header_requests',
            [
                'headers' => [
                    'Content-Type' => 'application/vnd.api+json',
                    'Accept' => 'application/vnd.api+json',
                ],
                RequestOptions::JSON => ['data' => $data],
            ]
        );
        $this->logger->info('PixiReportOrderHeaderRequest has been send', $data);
        if ($response->getStatusCode() !== self::HTTP_ACCEPTED) {
            throw new \RuntimeException("Unexpected response code: {$response->getStatusCode()}");
        }
    }

    public function sendPixiCustomerOrdersReportRequest(
        PixiCustomerOrdersReportRequest $pixiCustomerOrdersReportRequest
    ): void {
        $data = [
            'type' => 'PixiCustomerOrdersReportRequest',
            'attributes' => [
                'countryCode' => $pixiCustomerOrdersReportRequest->getCountryCode(),
                'customerEmail' => $pixiCustomerOrdersReportRequest->getCustomerEmail(),
                'recipientEmail' => $pixiCustomerOrdersReportRequest->getRecipientEmail(),
            ],
        ];
        $response = $this->esbClientFactory->create()->request(
            'POST',
            'api/pixi_report_customer_orders_requests',
            [
                'headers' => [
                    'Content-Type' => 'application/vnd.api+json',
                    'Accept' => 'application/vnd.api+json',
                ],
                RequestOptions::JSON => ['data' => $data],
            ]
        );
        $this->logger->info('PixiCustomerOrdersReportRequest has been send', $data);
        if ($response->getStatusCode() !== self::HTTP_ACCEPTED) {
            throw new \RuntimeException("Unexpected response code: {$response->getStatusCode()}");
        }
    }

    public function sendOrderRequest(OrderRequest $orderRequest): void
    {
        $data = [
            'type' => 'OrderRequest',
            'attributes' => [
                'createdAt' => $orderRequest->getCreatedAt()->format('c'),
                'websiteCode' => $orderRequest->getWebsiteCode(),
                'storeCode' => $orderRequest->getStoreCode(),
                'incrementId' => $orderRequest->getIncrementId(),
                'couponCode' => $orderRequest->getCouponCode(),
                'shippingMethod' => $orderRequest->getShippingMethod(),
                'shippingAmount' => $orderRequest->getShippingAmount(),
                'shippingAmountInclTax' => $orderRequest->getShippingAmountInclTax(),
                'shippingDescription' => $orderRequest->getShippingDescription(),
                'referenceNumber' => $orderRequest->getReferenceNumber(),
                'giftMessage' => $orderRequest->getGiftMessage(),
                'type' => $orderRequest->getType(),
                'grandTotal' => $orderRequest->getGrandTotal(),
                'voucherDiscount' => $orderRequest->getVoucherDiscount(),
                'voucherUsedDate' => $orderRequest->getVoucherUsedDate() ? $orderRequest->getVoucherUsedDate()->format('c') : null,
                'voucherIsGiftCard' => $orderRequest->getVoucherIsGiftCard(),
                'shippingPhoneNumber' => $orderRequest->getShippingPhoneNumber(),
                'shippingDateTimeFrom' => $orderRequest->getShippingDateTimeFrom() ? $orderRequest->getShippingDateTimeFrom()->format('c') : null,
                'shippingDateTimeTo' => $orderRequest->getShippingDateTimeTo() ? $orderRequest->getShippingDateTimeTo()->format('c') : null,
                'marketplace' => $orderRequest->getMarketplace(),
                'billingAddress' => [
                    'prefix' => $orderRequest->getBillingAddress()->getPrefix(),
                    'company' => $orderRequest->getBillingAddress()->getCompany(),
                    'firstName' => $orderRequest->getBillingAddress()->getFirstname(),
                    'lastName' => $orderRequest->getBillingAddress()->getLastname(),
                    'street' => $orderRequest->getBillingAddress()->getStreet(),
                    'postCode' => $orderRequest->getBillingAddress()->getPostcode(),
                    'city' => $orderRequest->getBillingAddress()->getCity(),
                    'country' => $orderRequest->getBillingAddress()->getCountry(),
                    'phone' => $orderRequest->getBillingAddress()->getPhone(),
                    'fax' => $orderRequest->getBillingAddress()->getFax(),
                    'vatId' => $orderRequest->getBillingAddress()->getVatId(),
                ],
                'shippingAddress' => [
                    'prefix' => $orderRequest->getShippingAddress()->getPrefix(),
                    'company' => $orderRequest->getShippingAddress()->getCompany(),
                    'firstName' => $orderRequest->getShippingAddress()->getFirstname(),
                    'lastName' => $orderRequest->getShippingAddress()->getLastname(),
                    'street' => $orderRequest->getShippingAddress()->getStreet(),
                    'postCode' => $orderRequest->getShippingAddress()->getPostcode(),
                    'city' => $orderRequest->getShippingAddress()->getCity(),
                    'country' => $orderRequest->getShippingAddress()->getCountry(),
                    'phone' => $orderRequest->getShippingAddress()->getPhone(),
                    'fax' => $orderRequest->getShippingAddress()->getFax(),
                ],
                'items' => $this->buildItemsData($orderRequest->getItems()),
                'payment' => [
                    'code' => $orderRequest->getPayment()->getCode(),
                    'baseCurrencyCode' => $orderRequest->getPayment()->getBaseCurrencyCode(),
                    'lastTransactionId' => $orderRequest->getPayment()->getLastTransactionId(),
                    'ccType' => $orderRequest->getPayment()->getCcType(),
                ],
                'customer' => [
                    'id' => $orderRequest->getCustomer()->getId(),
                    'email' => $orderRequest->getCustomer()->getEmail(),
                    'prefix' => $orderRequest->getCustomer()->getPrefix(),
                    'firstName' => $orderRequest->getCustomer()->getFirstName(),
                    'lastName' => $orderRequest->getCustomer()->getLastName(),
                    'eori' => $orderRequest->getCustomer()->getEori(),
                    'isGuest' => $orderRequest->getCustomer()->isGuest(),
                    'isBusiness' => $orderRequest->getCustomer()->isBusiness(),
                    'spedition' => $orderRequest->getCustomer()->isSpedition(),
                    'isFirstTimeOrder' => $orderRequest->getCustomer()->isFirstTimeOrder(),
                    'ordersCount' => $orderRequest->getCustomer()->getOrdersCount(),
                    'printInvoice' => $orderRequest->getCustomer()->isPrintInvoice(),
                    'b2bIndustry' => $orderRequest->getCustomer()->getB2bIndustry(),
                    'isKeyAccount' => $orderRequest->getCustomer()->getIsKeyAccount(),
                    'telAnnouncement' => $orderRequest->getCustomer()->getTelAnnouncement(),
                    'dunningEmail' => $orderRequest->getCustomer()->getDunningEmail(),
                    'invoicesEmail' => $orderRequest->getCustomer()->getInvoicesEmail(),
                    'invoiceDueDate' => $orderRequest->getCustomer()->getInvoiceDueDate(),
                    'dob' => $orderRequest->getCustomer()->getDob(),
                    'group' => $orderRequest->getCustomer()->getGroup(),
                    'organizationName' => $orderRequest->getCustomer()->getOrganizationName(),
                ],
            ],
        ];
        $response = $this->getClient()->request(
            'POST',
            'api/order_requests',
            [
                'headers' => [
                    'Content-Type' => 'application/vnd.api+json',
                    'Accept' => 'application/vnd.api+json',
                ],
                RequestOptions::JSON => ['data' => $data],
            ]
        );
        $this->logger->info('OrderRequest has been send', $data);
        if ($response->getStatusCode() !== self::HTTP_ACCEPTED) {
            throw new \RuntimeException("Unexpected response code: {$response->getStatusCode()}");
        }
    }

    public function sendPimProductMsiFallback(PimProductMsiFallbackRequest  $request): void
    {
        $data =  [
            'type' => 'PimProductMsiFallbackRequest',
            'attributes' => [
                'sku' => $request->getSku(),
                'countryCode' => $request->getCountryCode(),
                'isMsiFallbackDisabled' => $request->getIsMsiFallbackDisabled(),
            ],
        ];

        $response = $this->esbClientFactory->create()->request(
            'POST',
            'api/pim_product_msi_fallback_requests',
            [
                'headers' => [
                    'Content-Type' => 'application/vnd.api+json',
                    'Accept' => 'application/vnd.api+json',
                ],
                RequestOptions::JSON => [
                    'data' => $data
                ],
            ]
        );
        $this->logger->info('PimProductMsiFallbackRequest has been send', $data);
        if ($response->getStatusCode() !== self::HTTP_ACCEPTED) {
            throw new \RuntimeException("Unexpected response code: {$response->getStatusCode()}");
        }
    }

    public function sendAlcoholTaxReportingWarehouseRequest(AlcoholTaxReportingWarehouseRequest $request): void
    {
        $data = [
            'type' => 'AlcoholTaxReportingWarehouseRequest',
            'attributes' => [
                'email' => $request->getEmail(),
                'countryCode' => $request->getCountryCode(),
                'yearMonthDate' => $request->getYearMonthDate()->format('Y-m-d'),
            ],
        ];
        $response = $this->esbClientFactory->create()->request(
            'POST',
            'api/alcohol_tax_reporting_warehouse_requests',
            [
                'headers' => [
                    'Content-Type' => 'application/vnd.api+json',
                    'Accept' => 'application/vnd.api+json',
                ],
                RequestOptions::JSON => ['data' => $data],
            ]
        );
        $this->logger->info('AlcoholTaxReportingWarehouseRequest has been send', $data);
        if ($response->getStatusCode() !== self::HTTP_ACCEPTED) {
            throw new \RuntimeException("Unexpected response code: {$response->getStatusCode()}");
        }
    }

    public function sendMarketplaceOrderRequest(MarketplaceOrderRequest $marketplaceOrderRequest): array
    {
        $products = [];
        foreach ($marketplaceOrderRequest->getProducts() as $product) {
            $products[] = [
                'sku' => $product->getSku(),
                'qty' => $product->getQty(),
                'price' => $product->getPrice(),
            ];
        }
        $data = [
            'customer_id' => $marketplaceOrderRequest->getCustomerId(),
            'products' => $products,
            'payment_method' => $marketplaceOrderRequest->getPaymentMethod(),
            'billing_address' => [
                'firstname' => $marketplaceOrderRequest->getBillingAddress()->getFirstname(),
                'lastname' => $marketplaceOrderRequest->getBillingAddress()->getLastname(),
                'company' => $marketplaceOrderRequest->getBillingAddress()->getCompany(),
                'street' => $marketplaceOrderRequest->getBillingAddress()->getStreet(),
                'postcode' => $marketplaceOrderRequest->getBillingAddress()->getPostcode(),
                'city' => $marketplaceOrderRequest->getBillingAddress()->getCity(),
            ],
            'shipping_address' => [
                'firstname' => $marketplaceOrderRequest->getShippingAddress()->getFirstname(),
                'lastname' => $marketplaceOrderRequest->getShippingAddress()->getLastname(),
                'company' => $marketplaceOrderRequest->getShippingAddress()->getCompany(),
                'street' => $marketplaceOrderRequest->getShippingAddress()->getStreet(),
                'postcode' => $marketplaceOrderRequest->getShippingAddress()->getPostcode(),
                'city' => $marketplaceOrderRequest->getShippingAddress()->getCity(),
                'telephone' => $marketplaceOrderRequest->getShippingAddress()->getTelephone(),
            ],
            'shipping_method' => $marketplaceOrderRequest->getShippingMethod(),
            'delivery_date' => $marketplaceOrderRequest->getDeliveryDate(),
            'marketplace' => $marketplaceOrderRequest->getMarketplace(),
        ];
        $this->logger->info('Sending MarketplaceOrderRequest', $data);
        $response = $this->esbClientFactory->create()->request(
            'POST',
            sprintf('api/magento/%s/create-order', strtoupper($marketplaceOrderRequest->getCountryCode())),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                RequestOptions::JSON => ['data' => $data],
            ]
        );
        $this->logger->info('MarketplaceOrderRequest has been send', $data);
        if ($response->getStatusCode() !== self::HTTP_OK) {
            throw new \RuntimeException("Unexpected response code: {$response->getStatusCode()}");
        }
        return json_decode((string)$response->getBody()->getContents(), true);
    }

    /**
     * @param OrderRequest\Item[] $items
     * @return array
     */
    private function buildItemsData(array $items): array
    {
        $itemsData = [];
        foreach ($items as $item) {
            $itemsData[] = [
                'price' => $item->getPrice(),
                'priceInclTax' => $item->getPriceInclTax(),
                'incrementId' => $item->getIncrementId(),
                'productId' => $item->getSku(),
                'name' => $item->getName(),
                'orderedQty' => $item->getOrderedQty(),
                'orderedExternalQty' => $item->getOrderedExternalQty(),
                'discountAmount' => $item->getDiscountAmount(),
                'discountPercent' => $item->getDiscountPercent(),
                'itemNote' => $item->getItemNote(),
                'rowTotal' => $item->getRowTotal(),
                'rowTotalInclTax' => $item->getRowTotalInclTax(),
                'taxAmount' => $item->getTaxAmount(),
                'isSilverbogenProduct' => $item->isSilverbogenProduct(),
                'family' => $item->getFamily(),
                'isHasManageStock' => $item->isHasManageStock(),
                'isBackOrderQuantityExceedsAvailable' => $item->isBackOrderQuantityExceedsAvailable(),
            ];
        }
        return $itemsData;
    }
}
