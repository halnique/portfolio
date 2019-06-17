import React from 'react';
import { storiesOf } from '@storybook/react';
import Index from './Index';

const profiles = [
    {
        name: 'name1',
        iconUrl: '',
        github: {
            url: 'https://github.com/',
        },
        twitter: {
            url: 'https://twitter.com/',
        },
        qiita: {
            url: 'https://qiita.com/',
        },
        hatena: {
            url: 'https://hatenablog.com/',
        },
        tags: [
            {
                id: 1,
                name: 'name1',
            },
            {
                id: 2,
                name: 'name2',
            },
            {
                id: 3,
                name: 'name3',
            },
        ],
    },
    {
        name: 'name2',
        iconUrl: '',
        github: {
            url: 'https://github.com/',
        },
        twitter: {
            url: 'https://twitter.com/',
        },
        qiita: {
            url: 'https://qiita.com/',
        },
        hatena: {
            url: 'https://hatenablog.com/',
        },
        tags: [
            {
                id: 1,
                name: 'name1',
            },
            {
                id: 2,
                name: 'name2',
            },
            {
                id: 3,
                name: 'name3',
            },
        ],
    },
];

storiesOf('Templates', module).add('Index', () => (
    <Index profiles={profiles}/>
));
