<?php

/* Icinga DB Web | (c) 2021 Icinga GmbH | GPLv2 */

namespace Icinga\Module\Icingadb\Common;

use Icinga\Application\Icinga;

trait TicketLinks
{
    /** @var bool */
    protected $ticketLinkEnabled = false;

    /**
     * Set whether list items should render host and service links
     *
     * @param bool $state
     *
     * @return $this
     */
    public function setTicketLinkEnabled(bool $state = true): self
    {
        $this->ticketLinkEnabled = $state;

        return $this;
    }

    /**
     * Get whether list items should render host and service links
     *
     * @return bool
     */
    public function getTicketLinkEnabled(): bool
    {
        return $this->ticketLinkEnabled;
    }

    /**
     * Get whether list items should render host and service links
     *
     * @return string
     */
    public function createTicketLinks($text): string
    {
        $tickets = Icinga::app()->getViewRenderer()->view->tickets;

        if ($this->getTicketLinkEnabled()) {
            /** @var \Icinga\Application\Hook\TicketHook $tickets */
            return isset($tickets) ? $tickets->createLinks($text) : $text;
        }

        return $text;
    }
}
