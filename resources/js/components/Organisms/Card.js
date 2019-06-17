import React from 'react';
import HeaderCard from '../Molecules/HeaderCard';
import BodyCard from './BodyCard';

const Card = (props) => (
    <div className="card-group">
        <HeaderCard profile={props.profile}/>
        <BodyCard profile={props.profile}/>
    </div>
);

export default Card;

