import React from 'react';
import { storiesOf } from '@storybook/react';
import Top from "../components/Templates/Top";

const profile1 = {
    id: 1,
    name: 'name1',
    introductions: 'introductions1 https://example.com',
    iconUrl: '',
    github: {
        account: 'example',
        url: 'https://github.com/',
    },
    twitter: {
        account: 'example',
        url: 'https://twitter.com/',
    },
    qiita: {
        account: 'example',
        url: 'https://qiita.com/',
    },
    hatena: {
        account: 'example',
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
};

const profile2 = {
    id: 2,
    name: 'name2',
    introductions: 'introductions https://example.com',
    iconUrl: '',
    github: {
        account: 'example',
        url: 'https://github.com/',
    },
    twitter: {
        account: 'example',
        url: 'https://twitter.com/',
    },
    qiita: {
        account: 'example',
        url: 'https://qiita.com/',
    },
    hatena: {
        account: 'example',
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
};

const profiles = [profile1, profile2];

storiesOf('Templates', module).add('Top', () => (
    <Top profiles={profiles}/>
));
