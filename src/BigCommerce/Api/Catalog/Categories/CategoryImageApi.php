<?php

namespace BigCommerce\ApiV3\Api\Catalog\Categories;

use BigCommerce\ApiV3\Api\Generic\ResourceImageApi;

class CategoryImageApi extends ResourceImageApi
{
    public const CATEGORY_IMAGE_ENDPOINT = 'catalog/categories/%d/image';

    protected function singleResourceEndpoint(): string
    {
        return self::CATEGORY_IMAGE_ENDPOINT;
    }
}
