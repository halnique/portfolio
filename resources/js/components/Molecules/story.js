import React from 'react';
import { storiesOf } from '@storybook/react';
import HeaderCard from './HeaderCard';

storiesOf('Molecules', module).add('HeaderCard', () => (
    <HeaderCard profile={{ name: 'name', iconUrl: '' }}/>
));
