<?php

namespace App\Services;

use App\Enums\ContainerStatus; // Assuming you have an Enum class for Container statuses
use App\Models\Container;
use Illuminate\Support\Facades\Http;

class ContainerService
{
    /**
     * Map Docker's container state to custom Enum values.
     *
     * @param string $dockerState The Docker state (e.g., 'running', 'exited', etc.)
     * @return string The corresponding custom Enum value (e.g., 'Online', 'Offline', etc.)
     */
    public function mapDockerStateToEnum(string $dockerState): string
    {
        switch ($dockerState) {
            case 'running':
                return ContainerStatus::Online; // Container is up and running
            case 'paused':
                return ContainerStatus::Starting; // Container is starting or paused (depending on context)
            case 'exited':
                return ContainerStatus::Offline; // Container is stopped
            case 'created':
                return ContainerStatus::Installing; // Container is being installed or created
            case 'stopped':
                return ContainerStatus::Stopping; // Container is in the process of stopping
            default:
                return ContainerStatus::Offline; // Default to Offline if status is unknown
        }
    }

    /**
     * Update the container's status from Docker.
     *
     * @param int $containerId The container ID
     * @return void
     */
    public function updateContainerStatus(string $containerId): void
    {
        // Get the container's status from your Docker API
        $status = Http::get("http://localhost:3000/containers/{$containerId}/status");

        if ($status->successful()) {
            $dockerState = $status->json()['status'];

            // Map the Docker state to your Enum
            $mappedStatus = $this->mapDockerStateToEnum($dockerState);

            // Update your container in the database with the mapped status
            Container::where('docker_id', $containerId)->update(['status' => $mappedStatus]);
        }
    }
}
