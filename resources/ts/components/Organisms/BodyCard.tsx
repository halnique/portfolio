import React from 'react';
import { Profile } from "index";
import Introductions from '../Atoms/Introductions';
import SocialArea from '../Molecules/SocialArea';
import TagArea from '../Molecules/TagArea';

type Props = {
    profile: Profile,
}

const BodyCard = (props: Props) => (
    <div className="card">
        <div className="card-body">
            <Introductions introductions={props.profile.introductions}/>
            <SocialArea profile={props.profile}/>
            <TagArea tags={props.profile.tags}/>
        </div>
    </div>
);

export default BodyCard;
