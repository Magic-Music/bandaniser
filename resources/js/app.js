import './bootstrap'
import * as bootstrap from 'bootstrap'

import './generic'

import {Calendar} from './calendar'
window.calendar = new Calendar

import {DisplayEvents} from './displayEvents.js'
window.displayEvents = new DisplayEvents

import {ManageEvents} from "./manageEvents.js";
window.manageEvents = new ManageEvents

import.meta.glob([
    '../images/**',
]);
