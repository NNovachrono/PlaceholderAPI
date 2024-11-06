# Placeholder List in PlaceholderAPI / Lista de Placeholders en PlaceholderAPI

This file contains a list of all available placeholders in **PlaceholderAPI**. Each entry includes the plugin name providing the placeholders, the plugin's status (public or private), a link if public, and a list of variables with descriptions.

Este archivo contiene una lista de todos los placeholders disponibles en **PlaceholderAPI**. Cada entrada incluye el nombre del plugin que proporciona los placeholders, el estado del plugin (público o privado), un enlace si es público, y una lista de variables con descripciones.

---

## Registration Format / Formato de Registro

To add a new placeholder, follow this format and place it in alphabetical order:  
Para agregar un nuevo placeholder, sigue este formato y colócalo en orden alfabético:

```markdown
[Plugin Name / Nombre del Plugin]:  
 - Status / Estado: [public/private | público/privado]  
 - Link / Enlace: [repository or plugin page link if public | enlace al repositorio o página del plugin si es público]  

Variables:
 - [Variable Name / Nombre de la Variable]: [Description of what the variable does / Descripción de lo que hace la variable]
```

---

## Placeholder List / Lista de Placeholders

### PlaceholderAPI:
 - **Status / Estado**: public / público
 - **Link / Enlace**: [https://github.com/PlaceholderAPI/PlaceholderAPI](https://github.com/PlaceholderAPI/PlaceholderAPI)

**Variables:**
 - **player_health**: Shows the player’s current health in current/max format.  
   Muestra la salud actual del jugador en el formato actual/max.
 - **server_time**: Displays the server’s current time in HH:MM:SS format.  
   Muestra la hora actual del servidor en el formato HH:MM:SS.

### MyPlugin:
 - **Status / Estado**: public / público
 - **Link / Enlace**: [https://github.com/user/MyPlugin](https://github.com/user/MyPlugin)

**Variables:**
 - **player_location**: Displays the player's current coordinates in the world.  
   Muestra las coordenadas actuales del jugador en el mundo.
 - **player_kills**: Shows the number of players defeated by the player.  
   Muestra la cantidad de jugadores que el jugador ha derrotado.

### PrivatePlugin:
 - **Status / Estado**: private / privado

**Variables:**
 - **vip_status**: Shows whether the player is VIP or not.  
   Muestra si el jugador es VIP o no.
 - **private_message**: Displays a custom message for the player.  
   Muestra un mensaje personalizado para el jugador.

---

> **Note / Nota**: If you want to add a new plugin with placeholders, edit this file following the format and in alphabetical order.  
> Si deseas agregar un nuevo plugin con placeholders, edita este archivo siguiendo el formato y en orden alfabético.