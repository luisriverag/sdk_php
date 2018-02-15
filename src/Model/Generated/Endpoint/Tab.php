<?php
namespace bunq\Model\Generated\Endpoint;

use bunq\Context\ApiContext;
use bunq\exception\BunqException;
use bunq\Http\ApiClient;
use bunq\Http\BunqResponse;
use bunq\Model\Core\AnchorObjectInterface;
use bunq\Model\Core\BunqModel;

/**
 * Once your CashRegister has been activated you can use it to create Tabs.
 * A Tab is a template for a payment. In contrast to requests a Tab is not
 * pointed towards a specific user. Any user can pay the Tab as long as it
 * is made visible by you. The creation of a Tab happens with
 * /tab-usage-single or /tab-usage-multiple. A TabUsageSingle is a Tab that
 * can be paid once. A TabUsageMultiple is a Tab that can be paid multiple
 * times by different users.
 *
 * @generated
 */
class Tab extends BunqModel implements AnchorObjectInterface
{
    /**
     * Error constants.
     */
    const ERROR_NULL_FIELDS = 'All fields of an extended model or object are null.';

    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_READ = 'user/%s/monetary-account/%s/cash-register/%s/tab/%s';
    const ENDPOINT_URL_LISTING = 'user/%s/monetary-account/%s/cash-register/%s/tab';

    /**
     * Object type.
     */
    const OBJECT_TYPE_GET = 'Tab';

    /**
     * @var TabUsageSingle
     */
    protected $tabUsageSingle;

    /**
     * @var TabUsageMultiple
     */
    protected $tabUsageMultiple;

    /**
     * Get a specific tab. This returns a TabUsageSingle or TabUsageMultiple.
     *
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $monetaryAccountId
     * @param int $cashRegisterId
     * @param string $tabUuid
     * @param string[] $customHeaders
     *
     * @return BunqResponseTab
     */
    public static function get(ApiContext $apiContext, int $userId, int $monetaryAccountId, int $cashRegisterId, string $tabUuid, array $customHeaders = []): BunqResponseTab
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [$userId, $monetaryAccountId, $cashRegisterId, $tabUuid]
            ),
            [],
            $customHeaders
        );

        return BunqResponseTab::castFromBunqResponse(
            static::fromJson($responseRaw)
        );
    }

    /**
     * Get a collection of tabs.
     *
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $monetaryAccountId
     * @param int $cashRegisterId
     * @param string[] $params
     * @param string[] $customHeaders
     *
     * @return BunqResponseTabList
     */
    public static function listing(ApiContext $apiContext, int $userId, int $monetaryAccountId, int $cashRegisterId, array $params = [], array $customHeaders = []): BunqResponseTabList
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [$userId, $monetaryAccountId, $cashRegisterId]
            ),
            $params,
            $customHeaders
        );

        return BunqResponseTabList::castFromBunqResponse(
            static::fromJsonList($responseRaw)
        );
    }

    /**
     * @return TabUsageSingle
     */
    public function getTabUsageSingle()
    {
        return $this->tabUsageSingle;
    }

    /**
     * @param TabUsageSingle $tabUsageSingle
     */
    public function setTabUsageSingle($tabUsageSingle)
    {
        $this->tabUsageSingle = $tabUsageSingle;
    }

    /**
     * @return TabUsageMultiple
     */
    public function getTabUsageMultiple()
    {
        return $this->tabUsageMultiple;
    }

    /**
     * @param TabUsageMultiple $tabUsageMultiple
     */
    public function setTabUsageMultiple($tabUsageMultiple)
    {
        $this->tabUsageMultiple = $tabUsageMultiple;
    }

    /**
     * @return BunqModel
     * @throws BunqException
     */
    public function getReferencedObject()
    {
        if (!is_null($this->tabUsageSingle)) {
            return $this->tabUsageSingle;
        }

        if (!is_null($this->tabUsageMultiple)) {
            return $this->tabUsageMultiple;
        }

        throw new BunqException(self::ERROR_NULL_FIELDS);
    }

    /**
     * @return bool
     */
    public function isAllFieldNull()
    {
        if (!is_null($this->tabUsageSingle)) {
            return false;
        }

        if (!is_null($this->tabUsageMultiple)) {
            return false;
        }

        return true;
    }
}
