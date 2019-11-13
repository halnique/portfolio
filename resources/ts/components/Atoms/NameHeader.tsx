import React from 'react';
import { Profile } from 'index';

type Props = {
    name: Profile.Name,
}

const NameHeader = (props: Props) => (
    <div className="card-header">{props.name}</div>
);

export default NameHeader;
