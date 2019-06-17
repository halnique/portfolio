import React from 'react';
import { storiesOf } from '@storybook/react';
import HeaderCard from './HeaderCard';
import SocialArea from './SocialArea';
import TagArea from './TagArea';

storiesOf('Molecules', module).add('HeaderCard', () => (
    <HeaderCard profile={{ name: 'name', iconUrl: '' }}/>
)).add('SocialArea', () => (
    <SocialArea profile={{
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
    }}/>
)).add('TagArea', () => (
    <TagArea tags={[
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
    ]}/>
));
