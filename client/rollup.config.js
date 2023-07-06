//noinspection JSUnusedGlobalSymbols

import typescript from '@rollup/plugin-typescript';


export default [
    {
        input: 'src/admin-zone/index.ts',
        output: {
            file: '../public/admin-zone.js',
            format: 'cjs',
            banner: "// noinspection ES6ConvertVarToLetConst\n"
        },
        plugins: [typescript()]
    },
    {
        input: 'src/client-zone/index.ts',
        output: {
            file: '../public/client-zone.js',
            format: 'cjs',
            banner: ""
        },
        plugins: [typescript()]
    }
];
