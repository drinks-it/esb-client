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
}
