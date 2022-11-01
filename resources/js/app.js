require('./bootstrap');
import 'alpinejs';
require('alpinejs');

import Choices from 'choices.js';

//Create multiple select

window.choices = (element) => {
    return new Choices(element, {
        removeItemButton: true,
        /*searchEnabled: false,
        itemSelectText: '',*/
        maxItemCount: 5,
    });
}