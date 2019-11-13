import React from 'react';
import { Profile } from "index";
import HeaderCard from '../Molecules/HeaderCard';
import BodyCard from './BodyCard';

type Props = {
    profile: Profile,
}

const Card = (props: Props) => (
    <div className="card-group">
        <HeaderCard profile={props.profile}/>
        <BodyCard profile={props.profile}/>
    </div>
);

export default Card;
