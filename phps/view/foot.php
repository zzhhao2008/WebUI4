<div style="color: gray;" class="container footbar">
    <hr class="hr">
    <p style="opacity: 0.5;font-size:smaller">本页面框架由ZSV Studio提供,<a href="https://github.com/zzhhao2008/WebUI4">GitHub</a></p>
</div>
<style>
    .footbar {
        text-align: center;
        background: none;
    }

    .hr {
        border: 0;
        font-size: 12px;
        padding: 10px 0;
        position: relative;
        background: none;
    }

    .hr::before {
        content: "<?=$config['name']?>";
        position: absolute;
        padding: 0 10px;
        line-height: 1px;
        border: solid #9f9f9f;
        border-width: 0 100vw;
        white-space: nowrap;
        left: 50%;
        transform: translateX(-50%);
    }
</style>