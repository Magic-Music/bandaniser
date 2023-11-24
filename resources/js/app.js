import './bootstrap'
import * as bootstrap from 'bootstrap'

import './generic'

import {Calendar} from './calendar'
window.calendar = new Calendar

import {Events} from './events'
window.events = new Events

import {Create} from "./create";
window.create = new Create

import.meta.glob([
    '../images/**',
]);
