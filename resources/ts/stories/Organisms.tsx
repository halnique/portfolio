import React from 'react';
import { storiesOf } from '@storybook/react';
import BodyCard from "../components/Organisms/BodyCard";
import Card from "../components/Organisms/Card";

const profile = {
    id: 1,
    name: 'name',
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

storiesOf('Organisms', module).add('BodyCard', () => (
    <BodyCard profile={profile}/>
)).add('Card', () => (
    <Card profile={profile}/>
));
