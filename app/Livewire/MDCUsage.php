<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MDCUsage extends Component
{
    public $container; // Container ID
    public $cpuUsage = '0%';
    public $memoryUsage = '0MB';
    public $memoryLimit = '0MB';
    public $diskUsed = '0MB';
    public $diskAvailable = '0MB';
    public $diskTotal = '0MB';
    public $diskUsagePercentage = '0%';

    protected $listeners = ['refreshUsage' => '$refresh'];

    public function mount($container)
    {
        $this->container = $container;
        $this->fetchUsage();
    }

    public function fetchUsage()
    {
        try {
            $response = Http::get("http://localhost:3000/containers/{$this->container->docker_id}/usage");

            if ($response->ok()) {
                $data = $response->json();

                if(isset($data['status'])) {
                    return;
                }

                $this->cpuUsage = $data['cpu']['usagePercentage'] . '%';
                $this->memoryUsage = $this->formatSize($data['memory']['usage']); // Convert bytes to MB/GB
                $this->memoryLimit = $this->formatSize($data['memory']['limit']); // Convert bytes to MB/GB
                $this->diskUsed = $this->formatUnit($data['disk']['used'], 'MB'); // Already in MB
                $this->diskAvailable = $this->formatUnit($data['disk']['available'], 'MB'); // Already in MB
                $this->diskTotal = $this->formatUnit($data['disk']['total'], 'MB'); // Already in MB
                $this->diskUsagePercentage = $data['disk']['usagePercentage'];
            }
        } catch (\Exception $e) {
            // Handle API errors
            session()->flash('error', 'Failed to fetch container usage: ' . $e->getMessage());
        }
    }

    /**
     * Format bytes to MB or GB based on the value.
     *
     * @param int $bytes The size in bytes.
     * @return string
     */
    private function formatSize($bytes)
    {
        if ($bytes >= 1024 * 1024 * 1024) {
            return round($bytes / (1024 * 1024 * 1024), 2) . ' GB'; // Convert to GB
        } elseif ($bytes >= 1024 * 1024) {
            return round($bytes / (1024 * 1024), 2) . ' MB'; // Convert to MB
        } else {
            return round($bytes / 1024, 2) . ' KB'; // Optional: Convert to KB for very small sizes
        }
    }

    /**
     * Format a size value (e.g., MB) to GB if it exceeds 1024.
     *
     * @param string|int $value The value (e.g., "1995 MB")
     * @param string $unit The unit of the value (e.g., "MB")
     * @return string
     */
    private function formatUnit($value, $unit)
    {
        // Strip the unit from the value if present
        $numericValue = (float) filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        if ($unit === 'MB' && $numericValue >= 1024) {
            return round($numericValue / 1024, 2) . ' GB'; // Convert to GB
        }

        return round($numericValue, 2) . ' ' . $unit; // Keep as MB or other unit
    }

    public function render()
    {
        return view('livewire.m-d-c-usage');
    }
}
