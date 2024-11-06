# Contribution Guide to PlaceholderAPI / Guía de Contribución a PlaceholderAPI

Thank you for your interest in contributing to **PlaceholderAPI**. This project follows a modular structure where each variable or tag is represented through an independent class. Below, you'll find instructions to create and register your placeholders in **PlaceholderAPI**.

Gracias por tu interés en contribuir a **PlaceholderAPI**. Este proyecto sigue una estructura modular en la que cada variable o etiqueta se representa mediante una clase independiente. A continuación, te presentamos las instrucciones para crear y registrar tus placeholders en **PlaceholderAPI**.

---

## Contribution Requirements / Requisitos para Contribuir

1. **Create a Class for Each Placeholder / Crear una Clase para Cada Placeholder**

   - Each variable or tag should have its own class in your plugin.
   - Use `PlayerPlaceholder` or `ServerPlaceholder` base classes, depending on the type of placeholder you’re creating.
   - It is not necessary (nor allowed) to modify **PlaceholderAPI**’s core.

   Cada variable o etiqueta debe tener su propia clase en tu plugin.
   Utiliza las clases base `PlayerPlaceholder` o `ServerPlaceholder` según el tipo de placeholder que estés creando.
   No es necesario (ni permitido) modificar el núcleo de **PlaceholderAPI**.

2. **Register Your Placeholder / Registrar tu Placeholder**

   - In your plugin’s main file, check that **PlaceholderAPI** is enabled.
   - Register your placeholder class in `PlaceholderRegistry` using the `registerPlaceholder` method.

   En el archivo principal de tu plugin, verifica que **PlaceholderAPI** esté habilitado.
   Registra tu clase de placeholder en `PlaceholderRegistry` utilizando el método `registerPlaceholder`.

3. **Add Your Placeholder to VARIABLES.md / Agregar tu Placeholder a VARIABLES.md**

   - Edit **VARIABLES.md** to include your placeholder in **alphabetical order**.
   - Specify the plugin’s status (public or private).
   - If your plugin is public, provide a link for other developers to access it.

   Edita **VARIABLES.md** para incluir tu placeholder en **orden alfabético**.
   Especifica el estado del plugin (público o privado).
   Si tu plugin es público, proporciona un enlace para que otros desarrolladores puedan acceder a él.

---

## Format for Registering Placeholders in VARIABLES.md / Formato para Registrar Placeholders en VARIABLES.md

Each placeholder should be added to **VARIABLES.md** in the following format:  
Cada placeholder debe añadirse a **VARIABLES.md** siguiendo este formato:

```markdown
[Plugin Name / Nombre del Plugin]:

- Status / Estado: [public/private | público/privado]
- Link / Enlace: [repository or plugin page link if public | enlace al repositorio o página del plugin si es público]

Variables:

- [Variable Name / Nombre de la Variable]: [Description of what the variable does / Descripción de lo que hace la variable]
```

### Example in VARIABLES.md / Ejemplo en VARIABLES.md

```markdown
MyPlugin:

- Status / Estado: public / público
- Link / Enlace: [https://github.com/user/MyPlugin](https://github.com/user/MyPlugin)

Variables:

- player_health: Displays the player's current health in current/max format / Muestra la salud actual del jugador en el formato actual/max.
- player_location: Displays the player's current coordinates in the world / Muestra las coordenadas actuales del jugador en el mundo.

PrivatePlugin:

- Status / Estado: private / privado

Variables:

- private_status: Displays a specific status message for the player / Muestra un mensaje específico de estado para el jugador.
- vip_level: Shows the player’s VIP level / Muestra el nivel VIP del jugador.
```

---

## Example of Placeholder Class / Ejemplo de Clase de Placeholder

Below is an example of how to create a placeholder class for the player’s health percentage:  
A continuación, un ejemplo de cómo crear una clase de placeholder para el porcentaje de salud de un jugador:

```php
<?php

namespace YourNamespace;

use Nozell\PlaceholderAPI\placeholders\PlayerPlaceholder;
use pocketmine\player\Player;

class PlayerHealthPercentage extends PlayerPlaceholder {

    public function getIdentifier(): string {
        return "player_health_percentage";
    }

    protected function processPlayer(Player $player): string {
        return (int)(($player->getHealth() / $player->getMaxHealth()) * 100) . "%";
    }
}
```

### Example of Registering in Main Plugin / Ejemplo de Registro en el Plugin Principal

Here’s an example of how to register the placeholder in your plugin’s main file:  
Aquí tienes un ejemplo de cómo registrar el placeholder en el archivo principal de tu plugin:

```php
use pocketmine\plugin\PluginBase;
use Nozell\PlaceholderAPI\PlaceholderAPI;
use YourNamespace\PlayerHealthPercentage;

class YourPlugin extends PluginBase {
    public function onEnable(): void {
        $placeholderAPI = $this->getServer()->getPluginManager()->getPlugin("PlaceholderAPI");

        if ($placeholderAPI !== null && $placeholderAPI->isEnabled()) {
            // Register your custom placeholder / Registra tu placeholder personalizado
            PlaceholderAPI::getRegistry()->registerPlaceholder(new PlayerHealthPercentage());
            $this->getLogger()->info("Placeholder 'player_health_percentage' registered in PlaceholderAPI.");
            // Placeholder 'player_health_percentage' registrado en PlaceholderAPI.
        } else {
            $this->getLogger()->warning("PlaceholderAPI is not enabled.");
            // PlaceholderAPI no está habilitado.
        }
    }
}
```

---

## Submitting a Pull Request / Envío de Pull Requests

1. **Add an Entry in VARIABLES.md / Agregar una Entrada en VARIABLES.md**  
   Simply edit **VARIABLES.md** to add your plugin and the placeholders it provides. Follow the described format and ensure it is placed in alphabetical order.

   Solo necesitas editar **VARIABLES.md** para agregar tu plugin y los placeholders que provee. Sigue el formato descrito y asegúrate de colocarlo en orden alfabético.

2. **Fork the Repository and Make Changes / Crear un Fork y Realizar Cambios**  
   Create a fork of the repository and make your changes in a new branch.

   Haz un fork del repositorio y realiza tus cambios en una nueva rama.

3. **Submit a Pull Request / Enviar un Pull Request**  
   Submit a Pull Request to this repository and await review.

   Envía un Pull Request a este repositorio y espera la revisión.

---

By following these guidelines, you can contribute to **PlaceholderAPI** while maintaining an organized and detailed structure in **VARIABLES.md** without needing to modify the plugin’s core. Thank you for your contribution and for helping improve **PlaceholderAPI**!

Siguiendo estas guías, podrás contribuir a **PlaceholderAPI** manteniendo una estructura organizada y detallada en **VARIABLES.md** sin necesidad de modificar el núcleo del plugin. ¡Gracias por tu colaboración y por ayudarnos a mejorar **PlaceholderAPI**!
