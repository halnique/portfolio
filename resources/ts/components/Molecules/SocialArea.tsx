import React from 'react';
import { Profile } from "index";
import SocialLink from '../Atoms/SocialLink';

type Props = {
    profile: Profile,
}

const SocialArea = (props: Props) => (
    <div>
        <SocialLink name="GitHub" url={props.profile.github.url}/>
        <SocialLink name="Twitter" url={props.profile.twitter.url}/>
        <SocialLink name="Qiita" url={props.profile.qiita.url}/>
        <SocialLink name="はてなブログ" url={props.profile.hatena.url}/>
    </div>
);

export default SocialArea;
