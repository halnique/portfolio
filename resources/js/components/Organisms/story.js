import React from 'react';
import { storiesOf } from '@storybook/react';
import BodyCard from './BodyCard';
import Card from './Card';

const profile = {
    name: 'name',
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
};

storiesOf('Organisms', module).add('BodyCard', () => (
    <BodyCard profile={profile}/>
)).add('Card', () => (
    <Card profile={profile}/>
));
