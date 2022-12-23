<?php

	/**
	 * Abstract Tree class - Primarily used for handling category type structures
	 *
	 * @package default
	 * @author Rodney Amato
	 **/
	class Tree
	{
		var $nodesByPid = array();

		/**
		* GetTree
		* Returns the entire tree structure by pid
		*
		* @return array
		*/
		function GetTree()
		{
			return $this->nodesByPid;
		}

		/**
		* GetTreeDepthFirst
		* Returns the entire tree structure depth first by pid as a flat array
		*
		* @return array
		*/
		function GetTreeDepthFirst($id=0)
		{
			$nodes = array();
			if (isset($this->nodesByPid[$id])) {
				foreach ($this->nodesByPid[$id] as $subid) {
					$nodes[] = $subid;
					$nodes = array_merge($nodes, $this->GetTreeDepthFirst($subid));
				}
			}
			return $nodes;
		}

		/**
		* GetBranchFrom
		* Returns an entire branch from $start downwards
		*
		* @param integer $start The starting node
		* @param boolean $tree Preserve the tree structure or return a flat array
		* @param integer $maxdepth The maximum depth of the tree nodes to return or 0 for unlimited
		*
		* @return array
		*/
		function GetBranchFrom($start, $tree=true, $maxdepth=0)
		{
			$todo = array($start);
			$nodeids= array();
			$depth = 0;

			while(!empty($todo)) {
				$subnodeid = array_pop($todo);
				$depth = $this->GetDepth($subnodeid);

				if (isset($this->nodesByPid[$subnodeid])) {
					if ($maxdepth <= 0 || $depth < $maxdepth) {
						$todo = array_merge($todo, $this->nodesByPid[$subnodeid]);
					} else {
						continue;
					}

					if ($tree) {
						$nodeids[$subnodeid] = $this->nodesByPid[$subnodeid];
					} else {
						$nodeids = array_merge($nodeids, $this->nodesByPid[$subnodeid]);
					}
				}
			}

			return $nodeids;
		}

		/**
		* GetBranchTo
		* Returns an array of nodeids in order from the parent node down
		*
		* @param integer $end The node to stop at
		*
		* @return mixed The array of nodes in order or null if no node with that
		* value exists
		*/
		function GetBranchTo($end)
		{
			if (!$this->IsNode($end)) {
				return null;
			}
			$node = $end;
			$path = array($node);
			while ($node > 0) {

				$node = $this->GetParent($node);
				if ($node > 0) {
					$path[] = $node;
				}
			}
			return $path;
		}

		/**
		* GetParent
		* Returns the parent id of $id or false if $id doesn't exist in the
		* loaded set of nodes
		*
		* @return mixed
		*/
		function GetParent($id)
		{
			foreach ($this->nodesByPid as $pid => $ids) {
				if (in_array($id, $ids, true)) {
					return $pid;
				}
			}
			return false;
		}

		/**
		* GetSiblings
		* Returns the other nodeids at the current point in the tree
		*
		* @param $id The nodeid we are concerned with
		*
		* @return array The siblings (without the current node)
		*/
		function GetSiblings($id)
		{
			if (!isset($this->nodesByPid[$id])) {
				return array();
			}

			$sibs = $this->nodesByPid[$id];

			// Take out the current id
			$key = array_search($id, $sibs);
			unset($sibs[$key]);

			return $sibs;
		}

		/**
		* GetDepth
		* Returns the depth of a node in the tree or -1 if it doesn't exist
		*
		* @param integer $id The id of the node to get the depth of
		*
		* @return integer
		*/
		function GetDepth($id)
		{
			$path = $this->GetBranchTo($id);
			if ($path === null) {
				return -1;
			} elseif ($id === 0) {
				return 0;
			}  else {
				return count($path);
			}
		}

		/**
		* GetNodeCount
		* Returns a count of the number of nodes below the passed in one
		*
		* @param integer $catid The top most categoryid
		*
		* @return integer the number of sub nodes
		*/
		function GetNodeCount($id = 0)
		{
			// If there are no children then it's nice and fast
			if (!isset($this->nodesByPid[$id])) {
				return 0;
			}
			if (!is_array($this->nodesByPid[$id])) {
				return 0;
			}

			// Otherwise find out how many children there are
			return count($this->GetBranchFrom($id, false));
		}

		/**
		* IsNode
		* Is the value a valid node in our tree ?
		*
		* @param $id The id of the node to check
		*
		* @return boolean
		*/
		function IsNode($id)
		{
			// 0 Is the root node
			if ($id === 0) {
				return true;
			}

			$parents = array_keys($this->nodesByPid);

			if (in_array($id, $parents, true)) {
				return true;
			}

			foreach ($this->nodesByPid as $pid => $ids) {
				if (in_array($id, $ids, true)) {
					return true;
				}
			}

			return false;
		}

		/**
		* IsChild
		* Determine if node a is a child of node b in our tree
		*
		* @param integer $a The child
		* @param integer $b The parent
		*
		* @return boolean Returns true if a is a child of b or false otherwise.
		*                 If either a or b isn't in the tree return false
		*/
		function IsChild($a, $b)
		{
			// If a is a child of b then b is a parent of a
			return $this->IsParent($b, $a);
		}

		/**
		* IsParent
		* Determine if node a is a parent of node b in our tree
		*
		* @param integer $a The parent
		* @param integer $b The child
		*
		* @return boolean Returns true if a is a parent of b or false otherwise.
		*                 If either a or b isn't in the tree return false
		*/
		function IsParent($a, $b)
		{
			// Make sure a is a valid value
			if (!$this->IsNode($a)) {
				return false;
			}

			// Make sure b is a valid value
			if (!$this->IsNode($b)) {
				return false;
			}

			// 0 is the root node so it's always a parent
			if ($a == 0) {
				return true;
			}

			$path = $this->GetBranchTo($b);
			return in_array($a, $path, true);
		}
	}

?>
