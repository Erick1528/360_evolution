<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;

class ProspectCard extends Component
{

    public $actual_img;
    public $total_pages;

    public function mount()
    {
        $this->actual_img = 1;
        $this->total_pages = count(File::files('build/assets/prospect_images'));
    }

    public function previousPage()
    {
        if ($this->actual_img === 1) {
            $this->actual_img = 1;
        } else {
            $this->actual_img--;
        }
    }

    public function nextPage()
    {

        if ($this->actual_img === $this->total_pages) {
            $this->actual_img = $this->total_pages;
        } else {
            $this->actual_img++;
        }
    }

    public function getPaginationDotsProperty()
    {
        $maxDots = 4;
        $totalPages = $this->total_pages;
        $currentPage = $this->actual_img;

        if ($totalPages <= $maxDots) {
            return range(1, $totalPages);
        }

        $halfDots = floor($maxDots / 2);
        $start = max(1, $currentPage - $halfDots);
        $end = min($totalPages, $start + $maxDots - 1);

        if ($end - $start < $maxDots - 1) {
            $start = max(1, $end - $maxDots + 1);
        }

        return range($start, $end);
    }

    public function render()
    {
        return view('livewire.prospect-card');
    }
}
