<?php

namespace Nrgone\EsbClient\Request;

final class EmailRequest
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * @var null|string
     */
    private $cc;

    /**
     * @var null|string
     */
    private $bcc;

    /**
     * @var string
     */
    private $sender;

    /**
     * @var null|string
     */
    private $replyTo;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var null|string
     */
    private $contentType;

    /**
     * @var null|string
     */
    private $charset;

    /**
     * @var null|string
     */
    private $text;

    /**
     * @var null|string
     */
    private $html;

    /**
     * @var null|string
     */
    private $attachment;

    /**
     * @var null|string
     */
    private $attachmentName;

    /**
     * @var null|string
     */
    private $attachmentContentType;

    public function getFrom(): string
    {
        return $this->from;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function getCc(): ?string
    {
        return $this->cc;
    }

    public function getBcc(): ?string
    {
        return $this->bcc;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function getReplyTo(): ?string
    {
        return $this->replyTo;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    public function getCharset(): ?string
    {
        return $this->charset;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function getHtml(): ?string
    {
        return $this->html;
    }

    public function getAttachment(): ?string
    {
        return $this->attachment;
    }

    public function getAttachmentName(): ?string
    {
        return $this->attachmentName;
    }

    public function getAttachmentContentType(): ?string
    {
        return $this->attachmentContentType;
    }

    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    public function setTo(string $to): void
    {
        $this->to = $to;
    }

    public function setCc(?string $cc): void
    {
        $this->cc = $cc;
    }

    public function setBcc(?string $bcc): void
    {
        $this->bcc = $bcc;
    }

    public function setSender(string $sender): void
    {
        $this->sender = $sender;
    }

    public function setReplyTo(?string $replyTo): void
    {
        $this->replyTo = $replyTo;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function setContentType(?string $contentType): void
    {
        $this->contentType = $contentType;
    }

    public function setCharset(?string $charset): void
    {
        $this->charset = $charset;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function setHtml(?string $html): void
    {
        $this->html = $html;
    }

    public function setAttachment(?string $attachment): void
    {
        $this->attachment = $attachment;
    }

    public function setAttachmentName(?string $attachmentName): void
    {
        $this->attachmentName = $attachmentName;
    }

    public function setAttachmentContentType(?string $attachmentContentType): void
    {
        $this->attachmentContentType = $attachmentContentType;
    }
}
