<?php


namespace App\Service;


use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;

class Helper
{
//    protected $is;
    protected $cache;
    /**
     * @var LoggerInterface
     */
    private $ss;

    public function __construct( CacheInterface $cache, LoggerInterface $ss) {
        $this->cache = $cache;
//        $this->is = $is;
        $this->ss = $ss;
    }

    public function test (){
        $cat = 'cat';
        if ($cat === "cat") {
            $this->ss->info('CAT_msssssssssssssss,n,');
        }

            return 'uuuullmnknk';
    }

}