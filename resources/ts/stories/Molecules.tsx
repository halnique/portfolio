import React from 'react';
import { storiesOf } from '@storybook/react';
import HeaderCard from "../components/Molecules/HeaderCard";
import SocialArea from "../components/Molecules/SocialArea";
import TagArea from "../components/Molecules/TagArea";

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

storiesOf('Molecules', module).add('HeaderCard', () => (
    <HeaderCard profile={profile}/>
)).add('SocialArea', () => (
    <SocialArea profile={profile}/>
)).add('TagArea', () => (
    <TagArea tags={profile.tags}/>
));
