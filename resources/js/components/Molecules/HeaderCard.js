import React from 'react';
import NameHeader from '../Atoms/NameHeader';
import IconImage from '../Atoms/IconImage';

const HeaderCard = (props) => (
    <div className="card">
        <NameHeader name={props.profile.name}/>
        <IconImage iconUrl={props.profile.iconUrl}/>
    </div>
);

export default HeaderCard;
