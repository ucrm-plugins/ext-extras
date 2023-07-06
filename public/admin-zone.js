// noinspection ES6ConvertVarToLetConst

'use strict';

function plugin(pluginId)
{
    console.log(`Plugin ID: ${pluginId}`);
}

// admin-zone.js
const matches = window.location.pathname.match(/\/crm\/system\/plugins\/(\d+)/);
if (matches !== null) {
    //let [, pluginId] = matches;
    plugin(matches[1]);
}
