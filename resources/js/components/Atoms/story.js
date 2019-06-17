import React from 'react';
import { storiesOf } from '@storybook/react';
import NameHeader from './NameHeader';
import IconImage from './IconImage';
import Introductions from './Introductions';
import SocialLink from './SocialLink';
import Tag from './Tag';

storiesOf('Atoms', module).add('NameHeader', () => (
    <NameHeader name="name"/>
)).add('IconImage', () => (
    <IconImage iconUrl=""/>
)).add('Introductions', () => (
    <Introductions introductions="introductions https://example.com"/>
)).add('SocialLink', () => (
    <SocialLink name="example" url="https://example.com"/>
)).add('Tag', () => (
    <Tag name='example'/>
));
