import React from 'react';
import { storiesOf } from '@storybook/react';
import HeaderCard from './HeaderCard';
import SocialArea from './SocialArea';

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
));
