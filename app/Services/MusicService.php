<?php


namespace App\Services;


class MusicService
{
    protected $MusicRepository; //data access layer
    public function __construct()
    {
        $this->bannerRepository =new BannerRepository();
    }
}
