<?php
namespace Karamqubsi\Phpass;

use Illuminate\Hashing\HashManager as LaravelHashManager;
use Hautelook\Phpass\PasswordHash as PHPpassPasswordHash;
use Karamqubsi\Phpass\PhpassHasher;

class HashManager extends LaravelHashManager{

    public function createPhpassDriver()
    {
        return new PhpassHasher(new PHPpassPasswordHash(config('phpass.iteration_count'), config('phpass.portable_hashes')) );
    }
    
}