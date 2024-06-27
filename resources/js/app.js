import "./bootstrap";

import "../sass/app.scss";

import "./checkout-input.js";
import "./cart.js";
import "./checkout.js";
import "./order.js";
import "./track-order.js";

import {backToTop} from "./partials/back-to-top";
import {sticky} from "./partials/sticky";
import {modal} from "./partials/modal";

backToTop();
sticky();
modal();
