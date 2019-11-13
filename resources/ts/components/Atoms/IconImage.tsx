import React from 'react';
import { Profile } from "index";

type Props = {
    iconUrl: Profile.IconUrl,
}

const IconImage = (props: Props) => (
    <img src={props.iconUrl}
         alt="Icon"
         className="card-img-top"/>
);

export default IconImage;
