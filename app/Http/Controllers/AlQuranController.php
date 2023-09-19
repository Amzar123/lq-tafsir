<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Cache\Adapter\MemcachedAdapter;

class AlQuranController extends Controller
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var MemcachedAdapter
     */
    protected $mc;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;

        // If you have configured Memcached in Laravel's config/cache.php, you can use the Cache facade instead.
        // Example: $this->mc = cache()->store('memcached');
        $this->mc = new MemcachedAdapter(
            'database.doctrine.entitymanager.primary',
            0,
            'cache.memcached.cache'
        );
    }
}
