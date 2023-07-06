// admin-zone.js

import plugin from "./plugin"

const matches = window.location.pathname.match(/\/crm\/system\/plugins\/(\d+)/)
if (matches !== null)
{
    //let [, pluginId] = matches;
    plugin(matches[1]);

}
