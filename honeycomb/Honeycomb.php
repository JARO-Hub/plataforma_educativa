<?php
class HoneycombApp {
    private $title = "Honeycomb";

    public function __construct() {
        $this->initializeApp();
    }

    private function initializeApp() {
        $this->renderHeader();
        $this->renderContent();
        $this->renderFooter();
    }

    private function renderHeader() {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $this->title; ?></title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
        <?php
    }

    private function renderContent() {
        ?>
        <nav class="navbar">
            <a href="/" class="brand">
                <img src="/img/nombre.svg?height=30&width=30" alt="Honeycomb Logo" class="brand__logo">
                <span class="brand__name">HONEYCOMB</span>
            </a>

            <div class="nav">
                <a href="/inicio" class="nav__link">Inicio</a>
                <a href="/producto" class="nav__link">Producto</a>
                <a href="/quienes-somos" class="nav__link">Quienes Somos</a>
            </div>

            <div class="auth">
                <button class="auth__button auth__button--login" id="loginBtn">Iniciar Sesion</button>
                <button class="auth__button auth__button--register" id="registerBtn">Registrarse</button>
            </div>
        </nav>

        <!-- Login Modal -->
        <div class="modal" id="loginModal">
            <div class="modal__content">
                <div class="modal__header">
                    <h2 class="modal__title">Iniciar Sesion</h2>
                    <button class="modal__close">&times;</button>
                </div>
                <div class="modal__body">
                    <form class="form">
                        <div class="form__group">
                            <label class="form__label">Email:</label>
                            <input type="email" class="form__input" required>
                        </div>
                        <div class="form__group">
                            <label class="form__label">Password:</label>
                            <input type="password" class="form__input" required>
                        </div>
                        <button type="submit" class="form__button">Login</button>
                    </form>
                </div>
                <div class="modal__logo">
                    <img src="/img/logo.jpg height=200&width=200" alt="Honeycomb Logo" class="modal__logo-img">
                </div>
            </div>
        </div>

        <!-- Register Modal -->
        <div class="modal" id="registerModal">
            <div class="modal__content">
                <div class="modal__header">
                    <h2 class="modal__title">Registrate</h2>
                    <button class="modal__close">&times;</button>
                </div>
                <div class="modal__body">
                    <form class="form">
                        <div class="form__group">
                            <label class="form__label">Nombre:</label>
                            <input type="text" class="form__input" required>
                        </div>
                        <div class="form__group">
                            <label class="form__label">Apellidos:</label>
                            <input type="text" class="form__input" required>
                        </div>
                        <div class="form__group">
                            <label class="form__label">Email:</label>
                            <input type="email" class="form__input" required>
                        </div>
                        <div class="form__group">
                            <label class="form__label">Password:</label>
                            <input type="password" class="form__input" required>
                        </div>
                        <button type="submit" class="form__button">Registrarme</button>
                    </form>
                </div>
                <div class="modal__logo">
                    <img src="/img/logo.jpg height=200&width=200" alt="Honeycomb Logo" class="modal__logo-img">
                </div>
            </div>
        </div>
        <?php
    }

    private function renderFooter() {
        ?>
        <script src="script.js"></script>
        </body>
        </html>
        <?php
    }
}

// Initialize the application
$app = new HoneycombApp();
?>