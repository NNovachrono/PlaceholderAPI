# PlaceholderAPI for PocketMine-MP / PlaceholderAPI para PocketMine-MP

---

![GitHub followers](https://img.shields.io/github/followers/imjustnozell) ![GitHub Repo stars](https://img.shields.io/github/stars/imjustnozell/PlaceholderAPI) ![GitHub language count](https://img.shields.io/github/languages/count/imjustnozell/PlaceholderAPI)
![GitHub top language](https://img.shields.io/github/languages/top/imjustnozell/PlaceholderAPI)
![GitHub commit activity](https://img.shields.io/github/commit-activity/t/imjustnozell/PlaceholderAPI)
![GitHub contributors](https://img.shields.io/github/contributors/imjustnozell/PlaceholderAPI)
![GitHub Created At](https://img.shields.io/github/created-at/imjustnozell/PlaceholderAPI)

---


**PlaceholderAPI** is a modular and extensible API for PocketMine-MP, allowing developers to create and register custom placeholders (variables and tags) with dedicated classes. With this API, player and server placeholders are managed in an organized way, making it easy to integrate and extend in any PocketMine plugin.

**PlaceholderAPI** es una API modular y extensible para PocketMine-MP que permite a los desarrolladores crear y registrar placeholders (variables y etiquetas) personalizados mediante clases dedicadas. Con esta API, los placeholders de jugador y servidor se manejan de manera ordenada, facilitando su integración y extensión en cualquier plugin de PocketMine.

---

## Key Features / Características Principales

- **Modularity / Modularidad**: Each placeholder is implemented as an independent class, providing a clear and easily extendable organization.  
  Cada placeholder se implementa como una clase independiente, proporcionando una organización clara y fácil de extender.

- **Player & Server Compatibility / Compatibilidad con Jugador y Servidor**: Support for player-specific and server-specific placeholders.  
  Soporte para placeholders específicos de jugador y de servidor.

- **External Registration / Registro Externo**: Other plugins can register their custom placeholders without modifying **PlaceholderAPI**’s core.  
  Otros plugins pueden registrar sus placeholders personalizados sin modificar el núcleo de **PlaceholderAPI**.

- **Centralized Processing / Procesamiento Centralizado**: Replace placeholders in any text via a centralized registry.  
  Reemplazo de placeholders en cualquier texto mediante un registro centralizado.

---

## Project Structure / Estructura del Proyecto

- **src/**: Contains the main logic and base classes for placeholders.  
  Contiene la lógica principal y las clases base para los placeholders.

- **placeholders/**: Folder where classes for each custom variable or tag are added.  
  Carpeta donde se agregan las clases para cada variable o etiqueta personalizada.

- **events/**: Manages events for the dynamic registration of placeholders.  
  Gestión de eventos para el registro dinámico de placeholders.

---

## Installation / Instalación

1. Clone this repository into your PocketMine-MP server’s plugins folder.  
   Clona este repositorio en la carpeta de plugins de tu servidor PocketMine-MP.
2. Compile the plugin or use the generated `.phar` file to load it on your server.  
   Compila el plugin o utiliza el archivo `.phar` generado para cargarlo en tu servidor.
3. Restart your server to enable **PlaceholderAPI** properly.  
   Reinicia tu servidor para que **PlaceholderAPI** se habilite correctamente.

---

## Usage / Uso

To use **PlaceholderAPI** in your own plugin:  
Para utilizar **PlaceholderAPI** en tu propio plugin:

1. Create a class for each placeholder you want to add (see example below).  
   Crea una clase para cada placeholder que desees agregar (ver ejemplo más abajo).
2. Register the class in your main plugin without modifying **PlaceholderAPI**.  
   Registra la clase en tu plugin principal sin necesidad de modificar **PlaceholderAPI**.
3. Check **[VARIABLES.md](./VARIABLES.md)** for the full list of available placeholders and the plugins providing them.  
   Consulta **[VARIABLES.md](./VARIABLES.md)** para ver la lista completa de placeholders disponibles y los plugins que los proveen.

---

## Example of Creating and Registering a Placeholder / Ejemplo de Creación y Registro de un Placeholder

This example shows how to create a new placeholder that displays the player’s health and how to register it in your plugin.  
Este ejemplo muestra cómo crear un nuevo placeholder que muestra la salud del jugador y cómo registrarlo en tu plugin.

### Create a Placeholder Class / Crear una Clase de Placeholder

```php
<?php

namespace YourNamespace;

use Nozell\PlaceholderAPI\placeholders\PlayerPlaceholder;
use pocketmine\player\Player;

class HealthPlaceholder extends PlayerPlaceholder {

    public function getIdentifier(): string {
        return "player_health";
    }

    protected function processPlayer(Player $player): string {
        return $player->getHealth() . "/" . $player->getMaxHealth();
    }
}
```

### Register the Placeholder in the Main Plugin / Registrar el Placeholder en el Plugin Principal

In your plugin’s main file, register your placeholder class with PlaceholderAPI:  
En el archivo principal de tu plugin, registra tu clase de placeholder en PlaceholderAPI:

```php
use pocketmine\plugin\PluginBase;
use Nozell\PlaceholderAPI\PlaceholderAPI;
use YourNamespace\HealthPlaceholder;

class MyPlugin extends PluginBase {
    public function onEnable(): void {
        // Check if PlaceholderAPI is enabled
        $placeholderAPI = $this->getServer()->getPluginManager()->getPlugin("PlaceholderAPI");

        if ($placeholderAPI !== null && $placeholderAPI->isEnabled()) {
            // Register your custom placeholder
            PlaceholderAPI::getRegistry()->registerPlaceholder(new HealthPlaceholder());
            $this->getLogger()->info("Placeholder 'player_health' registered in PlaceholderAPI.");
        } else {
            $this->getLogger()->warning("PlaceholderAPI is not enabled.");
        }
    }
}
```

---

## Contribution / Contribución

To contribute to PlaceholderAPI, please see **CONTRIBUTE.md** for contribution guidelines. Add your placeholder in **VARIABLES.md** in alphabetical order, indicating the plugin providing it and whether it’s public or private.  
Para contribuir a PlaceholderAPI, consulta **CONTRIBUTE.md** para ver las guías de contribución. Solo necesitas agregar tu placeholder en **VARIABLES.md** siguiendo el orden alfabético, e indicar el plugin que lo proporciona y si es público o privado.

---

## Placeholder List / Lista de Placeholders

To view the complete list of available placeholders, see **VARIABLES.md**.  
Para ver la lista completa de placeholders disponibles, consulta **VARIABLES.md**.

---

## License / Licencia

This project is under the Apache license. See the LICENSE file for more details.  
Este proyecto está bajo la licencia Apache. Consulta el archivo LICENSE para más detalles.

---

With PlaceholderAPI, you can efficiently manage placeholders in your PocketMine plugins, keeping a well-organized and easily extendable structure. We look forward to your contributions to help this API grow!  
Con PlaceholderAPI, puedes administrar de manera eficiente los placeholders en tus plugins de PocketMine, manteniendo una estructura organizada y fácil de extender. ¡Esperamos tus contribuciones para hacer crecer esta API!

---
