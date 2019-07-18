import React from 'react';
import { storiesOf } from '@storybook/react';
import NameHeader from "../components/Atoms/NameHeader";
import IconImage from "../components/Atoms/IconImage";
import Introductions from "../components/Atoms/Introductions";
import SocialLink from "../components/Atoms/SocialLink";
import Tag from "../components/Atoms/Tag";

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

storiesOf('Atoms', module).add('NameHeader', () => (
    <NameHeader name={profile.name}/>
)).add('IconImage', () => (
    <IconImage iconUrl={profile.iconUrl}/>
)).add('Introductions', () => (
    <Introductions introductions={profile.introductions}/>
)).add('SocialLink', () => (
    <SocialLink name="example" url={profile.github.url}/>
)).add('Tag', () => (
    <Tag name={profile.tags[0].name}/>
));
