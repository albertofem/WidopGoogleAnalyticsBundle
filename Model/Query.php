<?php

/*
 * This file is part of the Widop package.
 *
 * (c) Widop <contact@widop.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Widop\GoogleAnalyticsBundle\Model;

/**
 * Google Analytics Query.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class Query
{
    /**
     * @const The Google analytics service URL.
     */
    const URL = 'https://www.googleapis.com/analytics/v3/data/ga';

    /**
     * @var string The Google analytics query ids.
     */
    private $ids;

    /**
     * @var \DateTime The Google analytics query start date.
     */
    private $startDate;

    /**
     * @var \DateTime The Google analytics query end date.
     */
    private $endDate;

    /**
     * @var array The Google analytics query metrics.
     */
    private $metrics;

    /**
     * @var array The Google analytics query dimensions.
     */
    private $dimensions;

    /**
     * @var array The Google analytics query sorts.
     */
    private $sorts;

    /**
     * @var array The Google analytics query filters.
     */
    private $filters;

    /**
     * Gets the google analytics query ids.
     *
     * @return string
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * Sets the google analytics query ids.
     *
     * @param string $ids The google analytics query ids.
     *
     * @return \Widop\GoogleAnalyticsBundle\Model\Query
     */
    public function setIds($ids)
    {
        $this->ids = $ids;

        return $this;
    }

    /**
     * Gets the google analytics query start date.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets the google analytics query start date.
     *
     * @param \DateTime $startDate The google analytics query start date.
     *
     * @return \Widop\GoogleAnalyticsBundle\Model\Query
     */
    public function setStartDate(\DateTime $startDate = null)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Gets the google analytics query end date.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Sets the google analytics query end date.
     *
     * @param \DateTime $endDate The google analytics query end date.
     *
     * @return \Widop\GoogleAnalyticsBundle\Model\Query
     */
    public function setEndDate(\DateTime $endDate = null)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Gets the google analytics query metrics.
     *
     * @return array
     */
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * Sets the google analytics query metrics.
     *
     * @param array $metrics The google analytics query metrics.
     *
     * @return \Widop\GoogleAnalyticsBundle\Model\Query
     */
    public function setMetrics(array $metrics)
    {
        $this->metrics = array();

        foreach ($metrics as $metric) {
            $this->addMetric($metric);
        }

        return $this;
    }

    /**
     * Adds a the google analytics metric to the query.
     *
     * @param string $metric The google analytics metric to add.
     *
     * @return \Widop\GoogleAnalyticsBundle\Model\Query
     */
    public function addMetric($metric)
    {
        $this->metrics[] = $metric;

        return $this;
    }

    /**
     * Checks if the google analytics query has dimensions.
     *
     * @return boolean TRUE if the google analytics query has a dimensions else FALSE.
     */
    public function hasDimensions()
    {
        return !empty($this->dimensions);
    }

    /**
     * Gets the google analytics query dimensions.
     *
     * @return array
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * Sets the google analytics query dimensions.
     *
     * @param array $dimensions The google analytics query dimensions.
     *
     * @return \Widop\GoogleAnalyticsBundle\Model\Query
     */
    public function setDimensions(array $dimensions)
    {
        $this->dimensions = array();

        foreach ($dimensions as $dimension) {
            $this->addDimension($dimension);
        }

        return $this;
    }

    /**
     * Adds a google analytics query dimension/
     *
     * @param string $dimension the google analytics dimension to add.
     *
     * @return \Widop\GoogleAnalyticsBundle\Model\Query
     */
    public function addDimension($dimension)
    {
        $this->dimensions[] = $dimension;

        return $this;
    }

    /**
     * Checks if the google analytics query has sorts.
     *
     * @return boolean TRUE if the google analytics query has sorts else FALSE.
     */
    public function hasSorts()
    {
        return !empty($this->sorts);
    }

    /**
     * Gets the google analytics query sorts.
     *
     * @return array
     */
    public function getSorts()
    {
        return $this->sorts;
    }

    /**
     * Sets the google analytics query sorts.
     *
     * @param array $sorts The google analytics query sorts.
     *
     * @return \Widop\GoogleAnalyticsBundle\Model\Query
     */
    public function setSorts(array $sorts)
    {
        $this->sorts = array();

        foreach ($sorts as $sort) {
            $this->addSort($sort);
        }

        return $this;
    }

    /**
     * Adds a google analytics query sort.
     *
     * @param string $sort A google analytics query sort to add.
     *
     * @return \Widop\GoogleAnalyticsBundle\Model\Query
     */
    public function addSort($sort)
    {
        $this->sorts[] = $sort;

        return $this;
    }

    /**
     * Checks if the google analytics query has filters.
     *
     * @return boolean TRUE if the google analytics query has filters else FALSE.
     */
    public function hasFilters()
    {
        return !empty($this->filters);
    }

    /**
     * Gets the google analytics query filters.
     *
     * @return array
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * Sets the google analytics query filters.
     *
     * @param array $filters The google analytics query filters.
     *
     * @return \Widop\GoogleAnalyticsBundle\Model\Query
     */
    public function setFilters(array $filters)
    {
        $this->filters = array();

        foreach ($filters as $filter) {
            $this->addFilter($filter);
        }

        return $this;
    }

    /**
     * Adds the google analytics filter.
     *
     * @param string $filter the google analytics filter to add.
     *
     * @return \Widop\GoogleAnalyticsBundle\Model\Query
     */
    public function addFilter($filter)
    {
        $this->filters[] = $filter;

        return $this;
    }

    /**
     * Builds the query.
     *
     * @param string $accessToken The access token used to build the query.
     *
     * @return string
     */
    public function build($accessToken)
    {
        $uri = self::URL.'?'.
               'ids='.urlencode($this->getIds()).'&'.
               'metrics='.urlencode(implode(',', $this->getMetrics())).'&'.
               'start-date='.$this->getStartDate()->format('Y-m-d').'&'.
               'end-date='.$this->getEndDate()->format('Y-m-d').'&'.
               'access_token='.$accessToken;

        if ($this->hasDimensions()) {
            $uri .= '&dimensions='.urlencode(implode(',', $this->getDimensions()));
        }

        if ($this->hasFilters()) {
            $uri .= '&filters='.urlencode(implode(',', $this->getFilters()));
        }

        if ($this->hasSorts()) {
            $uri .= '&sort='.urlencode(implode(',', $this->getSorts()));
        }

        return $uri;
    }
}
