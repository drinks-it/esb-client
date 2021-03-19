<?php

namespace Nrgone\EsbClient;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Nrgone\EsbClient\Factory\EsbClientFactory;
use Nrgone\EsbClient\Request\EmailRequest;
use Nrgone\EsbClient\Request\OrderRequest;
use Nrgone\EsbClient\Request\PimProductPriceRequest;
use Nrgone\EsbClient\Request\PixiReportOrderHeaderRequest;
use Nrgone\EsbClient\Request\PixiReportTaxRequest;
use Psr\Log\LoggerInterface;

final class ApiClient
{
    private const HTTP_ACCEPTED = 202;

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
                'shippingDescription' => $orderRequest->getShippingDescription(),
                'type' => $orderRequest->getType(),
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
                    'printInvoice' => $orderRequest->getCustomer()->isPrintInvoice(),
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
                'discountAmount' => $item->getDiscountAmount(),
                'itemNote' => $item->getItemNote(),
            ];
        }
        return $itemsData;
    }
}
