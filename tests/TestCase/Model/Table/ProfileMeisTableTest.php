<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfileMeisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfileMeisTable Test Case
 */
class ProfileMeisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfileMeisTable
     */
    public $ProfileMeis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.profile_meis',
        'app.users',
        'app.menus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProfileMeis') ? [] : ['className' => ProfileMeisTable::class];
        $this->ProfileMeis = TableRegistry::get('ProfileMeis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProfileMeis);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
