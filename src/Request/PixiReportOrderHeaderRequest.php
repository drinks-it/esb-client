<?php

namespace Nrgone\EsbClient\Request;

final class PixiReportOrderHeaderRequest
{
    /**
     * @var \DateTimeInterface
     */
    private $from;

    /**
     * @var \DateTimeInterface
     */
    private $to;

    /**
     * @var string
     */
    private $recipientEmail;

    public function getFrom(): \DateTimeInterface
    {
        return $this->from;
    }

    public function setFrom(\DateTimeInterface $from): void
    {
        $this->from = $from;
    }

    public function getTo(): \DateTimeInterface
    {
        return $this->to;
    }

    public function setTo(\DateTimeInterface $to): void
    {
        $this->to = $to;
    }

    public function getRecipientEmail(): string
    {
        return $this->recipientEmail;
    }

    public function setRecipientEmail(string $recipientEmail): void
    {
        $this->recipientEmail = $recipientEmail;
    }
}
