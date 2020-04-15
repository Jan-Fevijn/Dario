<?php

include 'conn.php';

abstract class Notification
{
    protected $recipient;
    protected $sender;
    protected $unread;
    protected $type;
    protected $parameters;
    protected $referenceId;
    protected $createdAt;

    /**
     * Message generators that have to be defined in subclasses
     */
    public function messageForNotification(Notification $notification) : string;
    public function messageForNotifications(array $notifications) : string;

    /**
     * Generate message of the current notification.
     */ 
    public function message() : string
    {
        return $this->messageForNotification($this);
    }
}
?>

<?php
namespace Notification\Comment;

class CommentLikedNotification extends \Notification
{
    /**
     * Generate a message for a single notification
     * 
     * @param Notification              $notification
     * @return string 
     */
    public function messageForNotification(Notification $notification) : string 
    {
        return $this->sender->getName() . 'update in schema: ' . substr($this->reference->text, 0, 10) . '...'; 
    }

    /**
     * Generate a message for a multiple notifications
     * 
     * @param array              $notifications
     * @return string 
     */
    public function messageForNotifications(array $notifications, int $realCount = 0) : string 
    {
        if ($realCount === 0) {
            $realCount = count($notifications);
        }

        // when there are two 
        if ($realCount === 2) {
            $names = $this->messageForTwoNotifications($notifications);
        }
        // less than five
        elseif ($realCount < 5) {
            $names = $this->messageForManyNotifications($notifications);
        }
        // to many
        else {
            $names = $this->messageForManyManyNotifications($notifications, $realCount);
        }

        return $names . ' Updates in schema: ' . substr($this->reference->text, 0, 10) . '...'; 
    }
}
?>


<?php
class NotificationManager
{
    protected $notificationAdapter;

    public function add(Notification $notification);

    public function markRead(array $notifications);

    public function get(User $user, $limit = 20, $offset = 0) : array;
}


public function add(Notification $notification)
{
    // only save the notification if no possible duplicate is found.
    if (!$this->notificationAdapter->isDoublicate($notification))
    {
        $this->notificationAdapter->add([
            'recipient_id' => $notification->recipient->getId(),
            'zender_id' => $notification->sender->getId()
            'unread' => 1,
            'type' => $notification->type,
            'parameters' => $notification->parameters,
            'reference_id' => $notification->reference->getId(),
            'created' => time(),
        ]);
    }
}
?>


<?php
$notifcationGroups = [];

foreach($results as $notification)
{
    $notifcationGroup = ['count' => $notification['count']];

    // when the group only contains one item we don't 
    // have to select it's children
    if ($notification['count'] == 1)
    {
        $notifcationGroup['items'] = [$notification];
    }
    else
    {
        // example with query builder
        $notifcationGroup['items'] = $this->select('notificaties')
            ->where('recipient_id', $recipient_id)
            ->andWehere('type', $notification['type'])
            ->andWhere('reference_id', $notification['reference_id'])
            ->limit(5);
    }

    $notifcationGroups[] = $notifcationGroup;
}
?>


<?php
class NotificationGroup
{
    protected $notifications;
 
    protected $realCount;

    public function __construct(array $notifications, int $count)
    {
        $this->notifications = $notifications;
        $this->realCount = $count;
    }

    public function message()
    {
        return $this->notifications[0]->messageForNotifications($this->notifications, $this->realCount);
    }

    // forward all other calls to the first notification
    public function __call($method, $arguments)
    {
        return call_user_func_array([$this->notifications[0], $method], $arguments);
    }
}
?>


<?php
public function get(User $user, $limit = 20, $offset = 0) : array
{
    $groups = [];

    foreach($this->notificationAdapter->get($user->getId(), $limit, $offset) as $group)
    {
        $groups[] = new NotificationGroup($group['notificaties'], $group['count']);
    }

    return $gorups;
}
?>

<?php
public function viewNotificationsAction(Request $request)
{
    $notificationManager = new NotificationManager;

    foreach($notifications = $notificationManager->get($this->getUser()) as $group)
    {
        echo $group->unread . ' | ' . $group->message() . ' - ' . $group->createdAt() . "\n"; 
    }

    // mark them as read 
    $notificationManager->markRead($notifications);
}
?>