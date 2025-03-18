<?php

namespace Mantix\EBoekhoudenRestLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array createSession()
 * @method static void endSession()
 * @method static array getAdministrations(int $limit = 100, int $offset = 0)
 * @method static array getLinkedAdministrations(int $limit = 100, int $offset = 0)
 * @method static array getCostCenters(array $params = [])
 * @method static array getCostCenter(int $id)
 * @method static array getEmailTemplates(int $limit = 100, int $offset = 0)
 * @method static array createInvoice(array $data)
 * @method static array getInvoices(array $params = [])
 * @method static array getInvoice(int $id)
 * @method static array getInvoiceTemplates(array $params = [])
 * @method static array getLedgers(array $params = [])
 * @method static array createLedger(array $data)
 * @method static array getLedger(int $id)
 * @method static void updateLedger(int $id, array $data)
 * @method static array getLedgerBalance(int $id, array $params = [])
 * @method static array getMutations(array $params = [])
 * @method static array createMutation(array $data)
 * @method static array getMutation(int $id)
 * @method static array getOutstandingInvoices(string $credDeb, int $limit = 100, int $offset = 0)
 * @method static array getProducts(array $params = [])
 * @method static array getProduct(int $id)
 * @method static array getRelations(array $params = [])
 * @method static array createRelation(array $data)
 * @method static array getRelation(int $id)
 * @method static void updateRelation(int $id, array $data)
 * @method static array getUnits(array $params = [])
 *
 * @see \Mantix\EBoekhoudenRestApi\Client
 */
class EBoekhouden extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'eboekhouden';
    }
}
