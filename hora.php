<?php

function obtenerHora () {
    return date("H:i A");
};

echo "¡Hola! ¿Me podrías decir qué hora es?\n";
echo "¡Claro! Son las " . obtenerHora();

?>