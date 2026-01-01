import { startStimulusApp } from '@symfony/stimulus-bundle';

const app = startStimulusApp();
// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);
import CarouselController from './controllers/carousel_controller.js';
import NavbarController from './controllers/navbar_controller.js';

app.register('carousel', CarouselController);
app.register('navbar', NavbarController);