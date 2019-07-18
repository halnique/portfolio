import React from 'react';
import { Profile } from "index";
import NameHeader from '../Atoms/NameHeader';
import IconImage from '../Atoms/IconImage';

type Props = {
    profile: Profile,
}

const HeaderCard = (props: Props) => (
    <div className="card">
        <NameHeader name={props.profile.name}/>
        <IconImage iconUrl={props.profile.iconUrl}/>
    </div>
);

export default HeaderCard;
