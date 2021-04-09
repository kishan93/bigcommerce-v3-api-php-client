<?php
namespace BigCommerce\ApiV3\Api\Channels;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\Channel\ChannelActiveThemeResponse;
use BigCommerce\ApiV3\ResponseModels\Channel\ChannelResponse;
use BigCommerce\ApiV3\ResponseModels\Channel\ChannelsResponse;
use Psr\Http\Message\ResponseInterface;

class ChannelsApi extends ResourceApi
{
    private const RESOURCE_NAME     = 'channels';
    private const CHANNEL_ENDPOINT  = 'channels/%d';
    private const CHANNELS_ENDPOINT = 'channels';
    private const ACTIVE_THEME_ENDPOINT = 'channels/%d/active-theme';

    public const INCLUDE__CURRENCIES = 'currencies';

    private const PARAM__INCLUDE = 'include';

    protected function singleResourceEndpoint(): string
    {
        return self::CHANNEL_ENDPOINT;
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::CHANNELS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    public function get(?string $include = null): ChannelResponse
    {
        $params = is_null($include) ? [] : [self::PARAM__INCLUDE => $include];

        return new ChannelResponse($this->getResource($params));
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ChannelsResponse
    {
        return new ChannelsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function delete(): ResponseInterface
    {
        throw new \RuntimeException("Unable to delete channels");
    }

    public function getActiveTheme(): ChannelActiveThemeResponse
    {
        $response = $this->getClient()->getRestClient()->get(
            sprintf(self::ACTIVE_THEME_ENDPOINT, $this->getResourceId())
        );

        return new ChannelActiveThemeResponse($response);
    }
}
