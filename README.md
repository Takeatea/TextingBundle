# Take a tea TextingBundle
This bundle allows Take a tea texting component integration into symfony

## Installation
### Add the lib in your `composer.json` file

    "require": {
        ...
        "takeatea/texting-bundle": "dev-master"
    }

Run a ``composer update takeatea/texting-bundle`` to fetch the bundle files.

### Enable the bundle in your ``app/AppKernel.php``

    <?php
        public function registerBundles() {
            $bundles = array(
                ...
                new Takeatea\TextingBundle\TakeateaTextingBundle()
            );

            return $bundles;
        }

### Define the providers as services
#### Using XML
    <service id="takeatea.texting.provider.alway_ok" class="%takeatea.texting.provider.alway_ok.class%" public="false">
        <tag name="takeatea_texting.provider"/>
    </service>

#### Using YAML
    services:
        takeatea.texting.provider.alway_ok:
            class: %takeatea.texting.provider.alway_ok.class%
            public: false
            tags: [{ name: "takeatea_texting.provider" }]

As you can see, providers should be declared as private services. Also, using the ``takeatea_texting.provider`` will allow to automatically register provider when building container.

For further informations, read the [texting component documentation]

### Usage
You can now have access to the manager. Exemple in a controller :

    <?php
        public function sendMessageAction()
        {
            $textingManager = $this->container->get('takeatea.texting.manager');
            $textingManager->send('+33101010101', 'test message');
        }

If you use multiple providers, you can specify as a third argument the provider name to use.

### License

This bundle is released under MIT license. See the attached file for more informations

[texting component documentation]:https://github.com/Takeatea/texting/blob/master/README.md
