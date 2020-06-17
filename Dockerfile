FROM php:7.3-cli-alpine

RUN $(php -r '$extensionInstalled = array_map("strtolower", \get_loaded_extensions(false));$requiredExtensions = ["bz2", "curl"];$extensionsToInstall = array_diff($requiredExtensions, $extensionInstalled);if ([] !== $extensionsToInstall) {echo \sprintf("docker-php-ext-install %s", implode(" ", $extensionsToInstall));}echo "echo \"No extensions\"";')

COPY build/lite /lite

ENTRYPOINT ["/lite"]
